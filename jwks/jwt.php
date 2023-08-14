<?php

include('vendor/autoload.php');

use Firebase\JWT\JWT;
use Firebase\JWT\JWK;

$key = json_decode('{
    "kty": "RSA",
    "created": "2022-01-28T05:38:34.000Z",
    "lastUpdated": "2022-01-28T05:38:34.000Z",
    "expiresAt": "2031-06-09T10:01:25.000Z",
    "kid": "SD0Zg0v4RKI7CoUTQwtpf2geS6DUxvisdfMoIDhiFrw",
    "use": "sig",
    "x5c": [
      "MIIDpjCCAo6gAwIBAgIGAXnwODNEMA0GCSqGSIb3DQEBBQUAMIGTMQswCQYDVQQGEwJVUzETMBEGA1UECAwKQ2FsaWZvcm5pYTEWMBQGA1UEBwwNU2FuIEZyYW5jaXNjbzENMAsGA1UECgwET2t0YTEUMBIGA1UECwwLU1NPUHJvdmlkZXIxFDASBgNVBAMMC2Rldi00MTEyNjYxMRwwGgYJKoZIhvcNAQkBFg1pbmZvQG9rdGEuY29tMB4XDTIxMDYwOTEwMDAyNVoXDTMxMDYwOTEwMDEyNVowgZMxCzAJBgNVBAYTAlVTMRMwEQYDVQQIDApDYWxpZm9ybmlhMRYwFAYDVQQHDA1TYW4gRnJhbmNpc2NvMQ0wCwYDVQQKDARPa3RhMRQwEgYDVQQLDAtTU09Qcm92aWRlcjEUMBIGA1UEAwwLZGV2LTQxMTI2NjExHDAaBgkqhkiG9w0BCQEWDWluZm9Ab2t0YS5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQClsakKBB2VXjdfadGEqIyEfqWfpCbU5q6YQDrCv25Ey91NcaWa29unqSqTVj5AvSLoFXldTDWBQOydpVUqJcIFqct7jppIWsN8O4dwN2/FKao1sHu0mnXhjIBOKMfrequuzaf8u8lz+HGQLSbzt65zSbfSMAFiLY8oR+KJ10ysi8+Ul/TJCC5QGfhMWGaJcfzvA3j8DbyqQLvbp91XBSlCi47RBO8PcOkiCGTp4S6Ua8/8ZbxAks5edreQv+ju+kK4YpRJx8/8RKi/v/p8vPy8LTKbPP90PM7OJnYlULhGA+nKgOHD+I3A7cahkNwPnqOJvEt7anV0NGkv41ti5FlfAgMBAAEwDQYJKoZIhvcNAQEFBQADggEBAB5+nq7fG7/efu2MhqPOtRgey8iO9cqvP2UUvTXida7ER1ISxXvPEAWuULXFNtnmmQvIzqQG+n8blenWDlFU242sCIrxZDWWjQSFW77qRaxNpZDW25vSXHhr0PLqsMTQmZPOt3Ce+LoGIlLVF8THrAFGszmjLWRGJWw7THQ2aZRxL6L1yDcqv35GMeBC6OvcP58Gz+5yTqzZJAhugfyYOHRZMr/lXQLKDlTatzo82h4LebLLBn4TkQAiGVOpLTe40zZ2jRqBVt6KvCywg1CZhKXSpJuMGBu4ZhwwKvSRMh7Ad5WbjasEjFJVPQqJSVy+WEAd+LM5BtE40OtQAdIchuo="
    ],
    "x5t#S256": "9g0ItgJ_lwZbbwYqCvrL6ho0XdQQPAPckqXt_IlEUnQ",
    "e": "AQAB",
    "alg": "RS256",
    "n": "pbGpCgQdlV43X2nRhKiMhH6ln6Qm1OaumEA6wr9uRMvdTXGlmtvbp6kqk1Y-QL0i6BV5XUw1gUDsnaVVKiXCBanLe46aSFrDfDuHcDdvxSmqNbB7tJp14YyATijH63qrrs2n_LvJc_hxkC0m87euc0m30jABYi2PKEfiiddMrIvPlJf0yQguUBn4TFhmiXH87wN4_A28qkC726fdVwUpQouO0QTvD3DpIghk6eEulGvP_GW8QJLOXna3kL_o7vpCuGKUScfP_ESov7_6fLz8vC0ymzz_dDzOziZ2JVC4RgPpyoDhw_iNwO3GoZDcD56jibxLe2p1dDRpL-NbYuRZXw"
  }', true);

  $key1 = json_decode('{
    "kty": "RSA",
    "alg": "RS256",
    "kid": "SD0Zg0v4RKI7CoUTQwtpf2geS6DUxvisdfMoIDhiFrw",
    "use": "sig",
    "e": "AQAB",
    "n": "gj44Sw_ubgybs8TSsF2WZ5ASRQPILbsLr-18BZmnCqzevk9VoaOc-9ZOE6o0ClxD1GyLXtxPeeXZ77tuXbR8iLZws-uqlVC7k-NiBkfNtNlJQqQIXkhAv1pq5Bor2KP2xb2Ce74MK6x0T8oYhHbfIJvn23vXMBsk0EZQlZbIruKQNg58jnJqFa2q1pfLjwMJyoOP5ArM7cdNfQh0aas7f61MFQQDIAmxCURJXNBXUysc9YucHT20lEK9tv82CI-CDWwvgOhXTqCEgEo5_XhwpviNNutIllAbgE6sX4AaKYOvSu-Yk5EzENVo0hp9PgKnCo_GGDYUMsD33fszYTO4iQ"
}', true);


$modulus = 'gj44Sw_ubgybs8TSsF2WZ5ASRQPILbsLr-18BZmnCqzevk9VoaOc-9ZOE6o0ClxD1GyLXtxPeeXZ77tuXbR8iLZws-uqlVC7k-NiBkfNtNlJQqQIXkhAv1pq5Bor2KP2xb2Ce74MK6x0T8oYhHbfIJvn23vXMBsk0EZQlZbIruKQNg58jnJqFa2q1pfLjwMJyoOP5ArM7cdNfQh0aas7f61MFQQDIAmxCURJXNBXUysc9YucHT20lEK9tv82CI-CDWwvgOhXTqCEgEo5_XhwpviNNutIllAbgE6sX4AaKYOvSu-Yk5EzENVo0hp9PgKnCo_GGDYUMsD33fszYTO4iQ';
$exponent = 'AQAB';

$keys = ['keys' =>
    [
        $key1
    ]
];

$bearer = "eyJraWQiOiJTRDBaZzB2NFJLSTdDb1VUUXd0cGYyZ2VTNkRVeHZpc2RmTW9JRGhpRnJ3IiwiYWxnIjoiUlMyNTYifQ.eyJ2ZXIiOjEsImp0aSI6IkFULkhBWWE5RUowc3dfTWZrYk9uRmZGTVY0cUlZeFhxNE1ocjFSckczeWlSY1UiLCJpc3MiOiJodHRwczovL2Rldi00MTEyNjYxLm9rdGEuY29tL29hdXRoMi9kZWZhdWx0IiwiYXVkIjoiYXBpOi8vZGVmYXVsdCIsImlhdCI6MTY0Mzk2MjE4NSwiZXhwIjoxNjQzOTY1Nzg1LCJjaWQiOiIwb2EzcXEwYzE0ZkFFbkl5czVkNyIsInNjcCI6WyJoZWxsby13b3JsZCJdLCJzdWIiOiIwb2EzcXEwYzE0ZkFFbkl5czVkNyJ9.UJd0qTihLOJc264WqsdXhepTvmFH62CN5qVt44Xvv-2XlMQ1s2aqCmnTq5w1t-2Lxkyb8xcuhihDq-zuMa89vn1NmQRi6OP6HWifCMaV3pUArn4zXeQmjBk1PpoxlYbLH_7DNAcmwrsnKAFh0wh09WAa7QtIGh-QYnJR0ypPAlAdMls51CmOq1aEv3p0_ZMUhIFEAE70mHtaiZxFXiylM8AkcNqXtdLBkM5q1GSClYfJ65yFLbbVVuZ0bnqClwHwOSeFikeVzgu6CA4hsXSL0EURgGHCdXgdz_0TmP4MOjq4keVAxEJ9IPqikIg1gMsLS_4V0RWh3yiKO0Q5dUqTGQ";
// JWK::parseKeySet($jwks) returns an associative array of **kid** to private

// key. Pass this as the second parameter to JWT::decode.
// Instead of RS256 use your own algo
// $data can return error so wrap it in try catch and do as you desire afterward
$data = (array) JWT::decode($bearer,
    JWK::parseKeySet($keys), ['RS256']);

var_dump($data);