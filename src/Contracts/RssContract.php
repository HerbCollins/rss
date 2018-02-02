<?php

/**
 * @author Moell <moell91@foxmail.com>
 */

namespace Moell\Rss\Contracts;

interface RssContract
{
    public function setEncode($encode);

    public function channel(array $channel);

    public function item(array $item);

    public function items(array $items);

    public function image(array $image);

    public function build();

    public function fastBuild(array $channel , array $image , array $item);

    public function __toString();
}