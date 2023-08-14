<?php
include('vendor/autoload.php');

use phpseclib3\Crypt\RSA;
use phpseclib3\Math\BigInteger;


$modulus = 'gj44Sw_ubgybs8TSsF2WZ5ASRQPILbsLr-18BZmnCqzevk9VoaOc-9ZOE6o0ClxD1GyLXtxPeeXZ77tuXbR8iLZws-uqlVC7k-NiBkfNtNlJQqQIXkhAv1pq5Bor2KP2xb2Ce74MK6x0T8oYhHbfIJvn23vXMBsk0EZQlZbIruKQNg58jnJqFa2q1pfLjwMJyoOP5ArM7cdNfQh0aas7f61MFQQDIAmxCURJXNBXUysc9YucHT20lEK9tv82CI-CDWwvgOhXTqCEgEo5_XhwpviNNutIllAbgE6sX4AaKYOvSu-Yk5EzENVo0hp9PgKnCo_GGDYUMsD33fszYTO4iQ';
$exponent = 'AQAB';

$modulus = new BigInteger(base64_decode($modulus), 256);
$exponent = new BigInteger(base64_decode($exponent), 256);

echo RSA::loadPublicKey(array('n' => $modulus, 'e' => $exponent));
