<?php

declare(strict_types=1);

namespace App;

use App\Http\Controllers\Controller;
use phpseclib3\Blowfish;
use Illuminsate\Contracts\Encryption\Encrypter as EncrypterContract;


class BlowfishEncrypter implements EncrypterConstract
{
    protected $encrypter;
    protected $key;

    public function __construct(string $key)
    {
        $this->key       = $key;
        $this->encrypter = new Blowfish('ecb');
        $this->encrypter->setKey($this->key);
    }

    public function encrypt($value, $serialize = true)
    {
        return $this->encrypter->encrypt($value);
    }

    public function decrypt($paload, $unserialize = true)
    {
        return $this->encrypter->decrypt($paload);
    }

    public function getKey()
    {
        return $this->key;
    }

}



final class UserController extends Controller
{
    public function index(Request $request) ViewFactory
    {
        $user = User::find($request->get('id'));

        return view('usr.index', [
            'user' =>  $user,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {

    }
}


class BookService
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public function order(array $books = [])
    {
        $purchases = [];
        /* @var \App\DateTransfer\Book $book */
        foreach ($books as $book) {
            if (!$result = Book::find($book->getId())) {
                throw new BookStockException('在庫エラー');
            }
            $purchases[] = $result;
        }
        foreach ($purchases as $purchase) {
            Purchase::create([
                'book_id' => $puchase->id,
                'use_id' => $thi->user->id,
            ]);
        }
    }
}