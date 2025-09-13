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




/*アクションパターン*/

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

final class UserIndexAction extends Controller{

    pricate $domain;
    $private $userResponder;

    public function __construct(
        UseService $useService,
        UseResponder $userResponder
    ) {
        $this->domain = $usersService;
        $this->usrResponder = $userResponder;

    }

    public function __invoke(Request $request)
    {
        return $this->usrResponder->response(
            return $this->userResponder->response(
                $$thi->domain->retrieveUser($request->ge('id'))
            );
        )
    }
}


/* レスポンダー */

<?php

declare(strict_types=1);

namespace App\Http\Responder;

use App\Models\User;
use GuzzleHttp\Psr7\Response;

class BookResponder 
{
    protected $response;
    protected $view;

    public function __construct(Response $response, ViewFactory $view)
    {
        $this->response = $response;
        $this->view = $view;
    }

    public function response(UserModel $user): Response
    {

        if (!$user) {
            $thi->response->seStatusCode(Response::HTTP_NOT_FOUND);
        }
        $this->response->setContent(
            $this->view->make('user,index', ['user' => $user])
        );
        return $this->response;

    }
    
}