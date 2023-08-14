<?php
include('vendor/autoload.php');
use phpseclib\Crypt\RSA;

$n = "gnQNq2kwhwr8lPj4wWwlzDgoPCnHyyns4FtvbjaAruFCJhjkXysszsaJsdTq6gX66t27ssnDWZpCUcuEKvqH5GWoS7SrFd1-KVxo-h9FULwryGKmVqzYFljpg9pjjmdqrCzfc7mRprRkx1gcDoHucH3ypTmn_AqJhX0HDarGUCnKaiwaWuQzMB9_KUgjfDoVuIm3BLqp0BZZaOCaAPe-w48zeBXSrjXrcCXizCAcEhKKxvK7rp-yd-MW9IkhA6UmrbyQScM6ClyJxe3CFDxEkLr1UFEd5RxYua8BA5ypbfn81WshHHlFFq8k3G1bauaIlw3-chAATJKeHPC0DVNewQ";
$e = "AQAB";

// Convert Base64 uri-safe variant to default (needed for JWKS)
$n = strtr($n, '-_', '+/');

$rsa = new RSA();

$key = "<RSAKeyPair>"
        . "<Modulus>" . $n . "</Modulus>"
        . "<Exponent>" . $e . "</Exponent>"
        . "</RSAKeyPair>";

$rsa->loadKey($key, RSA::PUBLIC_FORMAT_XML);

echo $rsa;