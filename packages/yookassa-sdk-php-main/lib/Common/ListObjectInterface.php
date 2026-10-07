<?php

/*
 * The MIT License
 *
 * Copyright (c) 2025 "YooMoney", NBСO LLC
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace YooKassa\Common;

use ArrayAccess;
use Countable;
use Ds\Vector;
use IteratorAggregate;
use JsonSerializable;

/**
 * Interface ListObjectInterface.
 *
 * @category Interface
 *
 * @author   cms@yoomoney.ru
 *
 * @link     https://yookassa.ru/developers/api
 */
interface ListObjectInterface extends ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    public function getType(): string;

    /**
     * @return $this
     */
    public function setType(string $type): ListObjectInterface;

    /**
     * @return $this
     */
    public function add(mixed $item): ListObjectInterface;

    /**
     * @return $this
     */
    public function merge(iterable $data): ListObjectInterface;

    /**
     * @return $this
     */
    public function remove(int $index): ListObjectInterface;

    /**
     * @return $this
     */
    public function clear(): ListObjectInterface;

    public function isEmpty(): bool;

    public function getItems(): Vector;

    public function get(int $index): AbstractObject;

    public function toArray(): array;
}
