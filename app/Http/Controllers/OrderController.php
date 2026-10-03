<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use UnseenCodes\Chat\Models\Conversation;
use UnseenCodes\Chat\Models\Message;

class OrderController extends Controller
{
    public function newOrder()
    {
        if (auth()->user()->status != 'guest') {
            return view('newOrder', ['title' => 'Разработка сайтов - новый заказ']);
        } else {
            $guestId = auth()->id();
            auth()->logout();
            session()->put('guest_id_to_merge', $guestId);
            return redirect()->route('register');
        }
    }

    public function CreateConversation($someone)
    {
        $chatingOrder = Order::create(['user_id' => $someone->id, 'status_id' => 1]);
        $admin = User::where('status', 'admin')->first();
        $conversation = Conversation::create(['type' => 'private']);
        DB::table('chat_participants')->insert([
            [
                'conversation_id' => $conversation->id,
                'participantable_id' => $someone->id,
                'participantable_type' => 'App\Models\User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'conversation_id' => $conversation->id,
                'participantable_id' => $admin->id,
                'participantable_type' => 'App\Models\User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $chatingOrder->conversation_id = $conversation->id;
        $chatingOrder->save();

        return $conversation;
    }

    public function getOrders($order = null)
    {
        if ($order == null) {
            $orders = null;
            $chatingOrder = null;

            if (Auth::check()) {
                $user = User::find(auth()->id());

                if ($user->status == 'admin') {
                    $orders = Order::orderBy('created_at', 'desc')->with('status')->get();
                    $lastMessage = Message::orderBy('created_at', 'desc')->first();
                    $chatingConversationId = $lastMessage->conversation_id;
                    $chatingOrder = Order::where('conversation_id', $chatingConversationId)->first();
                } else {
                    $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->with('status')->get();
                    $draft = $orders->where('status_id', 1)->first();

                    if ($draft && $draft->conversation_id) {
                        $chatingOrder = $draft;
                    } elseif ($draft) {
                        $admin = User::where('status', 'admin')->first();
                        $conversation = Conversation::create(['type' => 'private']);

                        DB::table('chat_participants')->insert([
                            [
                                'conversation_id' => $conversation->id,
                                'participantable_id' => auth()->id(),
                                'participantable_type' => 'App\Models\User',
                                'created_at' => now(),
                                'updated_at' => now(),
                            ],
                            [
                                'conversation_id' => $conversation->id,
                                'participantable_id' => $admin->id,
                                'participantable_type' => 'App\Models\User',
                                'created_at' => now(),
                                'updated_at' => now(),
                            ],
                        ]);

                        $draft->conversation_id = $conversation->id;
                        $draft->save();
                        $chatingOrder = $draft;
                    } else {
                        $conversation = $this->CreateConversation($user);
                        $lastMessage = Message::where('sender_id', auth()->id())->orderBy('created_at', 'desc')->first();

                        if ($lastMessage) {
                            $chatingConversationId = $lastMessage->conversation_id;
                            $chatingOrder = Order::where('conversation_id', $chatingConversationId)->first();
                        } else {
                            $chatingOrder = Order::where('conversation_id', $conversation->id)->first();
                        }
                    }
                }
            } else {
                $guestId = request()->cookie('guest_id');
                $user = User::find($guestId);

                if (empty($user)) {
                    $user = User::create(['name' => 'Гость', 'status' => 'guest', 'session_id' => session()->id()]);
                    cookie()->queue(cookie()->forever('guest_id', $user->id));
                }

                auth()->login($user);
                $chatingOrder = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->with('status')->first();

                if (empty($chatingOrder)) {
                    $conversation = $this->CreateConversation($user);
                    $chatingOrder = Order::where('conversation_id', $conversation->id)->first();
                }

                $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->with('status')->get();
            }
        } else {
            if (auth()->user()->status == 'admin') {
                $orders = Order::orderBy('created_at', 'desc')->with('status')->get();
            } else {
                $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->with('status')->get();
            }
            $chatingOrder = Order::find($order);
        }

        return view('showOrders', ['title' => 'Разработка сайтов: чаты и заказы', 'orders' => $orders, 'chatingOrder' => $chatingOrder, 'filtered' => false]);
    }
}
