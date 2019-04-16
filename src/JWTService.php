<?

namespace Consilience\LaravelJWT;

use Validator;
use Firebase\JWT\JWT;

class JWTService
{
    public $key;
    public $algo;
    public $payload;
    public $jwt;

    // TODO: Bind this as a singleton to the service container.

    public function __construct()
    {
        $this->key = config('jwt.secret');
        $this->algo = config('jwt.algo');

        JWT::$leeway = config('jwt.leeway', 0);
    }

    public function getToken()
    {
        return $this->jwt;
    }

    public function createToken($payload)
    {
        $jwt = JWT::encode($payload, $this->key, $this->algo);
        
        $this->jwt = $jwt;
        $this->payload = $payload;

        return $jwt;
    }

    public function parseToken(string $jwt)
    {
        $this->jwt = $jwt;

        if ($this->algo === 'HS256' || $this->algo === 'HS384' || $this->algo === 'HS512') {
            $this->payload = JWT::decode($jwt, $this->key, [$this->algo]);
        } else {
            // $privateKeyPath = base_path(config('jwt.keys.private'));
            $publicKeyPath = base_path(config('jwt.keys.public'));

            // $privateKey = file_get_contents($privateKeyPath);
            $publicKey = file_get_contents($publicKeyPath);

            $this->payload = JWT::decode($jwt, $publicKey, [$this->algo]);
        }

        return $this->payload;
    }

    public function validateToken($jwt, array $rules)
    {
        $validator = Validator::make((array)$jwt, $rules);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }
}