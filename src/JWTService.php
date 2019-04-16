<?

namespace Consilience\LaravelJWT;

use Validator;
use Firebase\JWT\JWT;
use Firebase\JWT\BeforeValidException;

class JWTService
{
    public $key;
    public $jwt;
    public $algo;
    public $payload;

    public function __construct()
    {
        $this->key = config('jwt.secret');
        $this->algo = config('jwt.algo');

        JWT::$leeway = config('jwt.leeway', 0);
    }

    public function parse(string $jwt)
    {
        if ($this->algo === 'HS256' || $this->algo === 'HS384' || $this->algo === 'HS512') {
            $this->payload = JWT::decode($this->jwt, $this->key, [$this->algo]);
        } else {
            // $privateKeyPath = base_path(config('jwt.keys.private'));
            $publicKeyPath = base_path(config('jwt.keys.public'));

            // $privateKey = file_get_contents($privateKeyPath);
            $publicKey = file_get_contents($publicKeyPath);

            $this->payload = JWT::decode($this->jwt, $publicKey, [$this->algo]);
        }

        $rules = null;
    }

    public function validate(array $rules)
    {
        $validator = Validator::make((array)$this->payload, $rules);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }
}