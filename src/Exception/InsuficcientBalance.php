<?php
namespace Binance\Exception;

use Laminas\Http\Request;
use Laminas\Http\Response;

class InsuficcientBalance extends BinanceException
{
    public function __construct(Request $req, Response|array $res)
    {
        parent::__construct($req, $res);

        $o = $req->getPost();
        $this->message = sprintf(
            'Account has insufficient balance to %s %s %.'.($o['quantity']?5:2).'f for %.2f',
            $o['side'],
            $o['symbol'],
            $o['quantity'] ?? $o['quoteOrderQty'],
            $o['price']
        );
    }
}
