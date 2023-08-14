<?php
require_once("vendor/autoload.php"); // This should be replaced with your path to your vendor/autoload.php file

$jwtVerifier = (new \Okta\JwtVerifier\JwtVerifierBuilder())
    ->setDiscovery(new \Okta\JwtVerifier\Discovery\Oauth) // This is not needed if using oauth.  The other option is `new \Okta\JwtVerifier\Discovery\OIDC`
    ->setAdaptor(new \Okta\JwtVerifier\Adaptors\FirebasePhpJwt)
    ->setAudience('api://default')
    ->setClientId('0oa3qq0c14fAEnIys5d7')
    ->setIssuer('https://dev-4112661.okta.com/oauth2/default')
    ->build();

$jwt = $jwtVerifier->verifyAccessToken("eyJraWQiOiJTRDBaZzB2NFJLSTdDb1VUUXd0cGYyZ2VTNkRVeHZpc2RmTW9JRGhpRnJ3IiwiYWxnIjoiUlMyNTYifQ.eyJ2ZXIiOjEsImp0aSI6IkFULjI1cTB4UUJFd2RLcGlxQllPX1N1SVNncGJ5dmoxMnhKQXBYTWdYSXZxREUiLCJpc3MiOiJodHRwczovL2Rldi00MTEyNjYxLm9rdGEuY29tL29hdXRoMi9kZWZhdWx0IiwiYXVkIjoiYXBpOi8vZGVmYXVsdCIsImlhdCI6MTY0MzYxNjA0MywiZXhwIjoxNjQzNjE5NjQzLCJjaWQiOiIwb2EzcXEwYzE0ZkFFbkl5czVkNyIsInNjcCI6WyJoZWxsby13b3JsZCJdLCJzdWIiOiIwb2EzcXEwYzE0ZkFFbkl5czVkNyJ9.WGNEIL_XUOZDXGgxeQ87pTnfukYBIPegI2B-f6BhbqpCF4pIp-sZlqbfTJDxQ-eeSqNi6uCmVp2PHGI6yr2ec6os22WC2_TZyd7z-SBOz73NjQ_1FmVuX2oFmib-4JJ2cj27kFii4YpcGWkPXIk_CTzoifF_jB436wz3HwXz2jvLBtxJoDoe05z0X1X1nW4f0_aFob9vvztXNmDmLun7e7Px9xpMGoYLFKdMwlZnN9vFkdcY3zKx85RR9fZGtE_jZ-o4I_stxxkKyzFwErLIL23p1T7TUG8AWHiWefX6JBioyAwbdKMdT6TDiLYVNJI4938ZkbH0tJX3MK6UJ9P1gw");

var_dump($jwt);