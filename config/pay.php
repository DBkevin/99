<?php
return [
    'alipay' => [
        'app_id'         => '2016092700608186',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwjgCnL8/8O1V24JmKjKRzzY8nlQrXnFTIzcIbxPJ+ezsgNLomGLDbrOtHq+rBuTS8FN4piG89/wEs7FMJcSA3M2LAGAkXTz+/TUd1XqK1VOzsmthLpiIrpHYSki8pyjh3hcsPJqyofOkZOIk2aGFUkS0k/p0WBTnGHJfndCwK0FeR4wl0xyfUjKtGx5XOwTsAghPeFlEP7mkII0lIpJB8GWxUpZZQOXP3+si4TqePoEnJojjE0hE5nM1f4QHmfJbJOHI52awk3lVN4EgDS1QvwfTyoDhTNUKOS2bbN5uurp8xubK27D5oME4EDPzG7CRBRKbSYHZla8k/257+eezIwIDAQAB',
        'private_key'    => 'MIIEowIBAAKCAQEAkWRVopGx6nfp88b6Im5gqu9rBNS25hcsjaYXZbhQ0xxlUbw9E4cd6TjRL5lkFb/Dn3ZfE5wbcWZ+S7HWV3IM+jWJg4OoGzX/iOI8Y4EAFILlmoriRdLeh5TGMwyAUWhn4175hl8/PVAz92uySjmaW11ZFcG+w0KUHp3Le/48Sam10qS+Pt4IyvwGzGxtbcan6cIVyWweP3s/hgW+6hz+HLC2YqkuatClkeTsqTibpTlmBOG92mT7W0ckLJ/dW9FgbSayA+Uvb3gCNz1eRngC2TW6dKo/c8ruInuoQnEJy0kOVntYZOdRw+f6iBsc450jO6TTljrIimTjiFUlDlznlwIDAQABAoIBACUNiv15X/w/PzJPXWP0+VHW3lFG3K3a7hHTaFcWGBMVQ4UHEhGt96N+RWF6GBWq33H+OtDGkf/efQVRdyyl9kS17CvGG8uDgXIjJfy93YVcrqMqDex5hxjKg5By+SjGEOPTSohCMd2wWO4PVkqwT3RFX/S5gaJFj3YWBMu+ySKEZx3IuTlujGQeuQnnvGJp/rcF8qXFfQqMmvEBBrmlARLN7UpZXnEX9XWGyjD7x9n0yfFDpn+jp/W6tBh5xUDI3WBx3co3K9Peh9byNiGn4A9pr9y020F5TAW96taJGEahqFjaNRlZfFMf/fK9n0znj4EPbEuGRkgZEXYVVvzd5iECgYEA72WVFsOqHHs5fCbWaq7856nEQFHH43F5mlmFqyhokjNUholJYpiSD0cxusNnvKHjEEhakuN3B8G3EjrYqV06GJfVGNiyZDETCDvptqAkIU9dJ7w3+NWzro2tRH5YXNQ6YgocXOzY5jXjgtn72dQeDo7IKlhTmqRGMb1ArwMWfQkCgYEAm3m5YCUI+mcSQexq93ZApPtn92/5xn+/5eR9/y1HALbDlbYkOKuNPUcMWBESD8Ivfx6xC9R4jIwQfJM9eWtqF7cqcsG6/lRmNQgEZSk5dfNFvyoK+BMH/WluJ50qYb3q2l1v90apgkLBKc4h7aXI5ErISRAA9o+XPJy3nw6qB58CgYBAmNSF8/4u+UElswUgfF9Z04FVKbwaL0B02bsr2Bd/e8JPGzRmGm0vGjLdBmUzjStL9XobMK2ptifED4TvDmzivfWOYsqgJm3QRvplgQi+xD+KvUsNJfz6GNisJruJMOsgEUJeALr2Q4xEfrVqrcX+f6CbbIICtFkMititYNPsoQKBgDsPwpwDdaWqAgWJChl3kpcZ6iTVJM2DOiLa6gJF8PMUergkuR3ODZl5o/bQhUv3OJPR1O/phuHdU2X/iRrW8zaPHlD5x09WQH1kzkafonRsNdKo5gHXOPHLW00xJyh6PP03AZGuBja1pSt8YuckU2xl/C/FJJiFc65S2m5R48WBAoGBAMIFnkcEjKBq1/dWWqdjsblt2MmtmvHi0W80xFs+TIfOQ+MuvgCcNoqPbInK2yNimAQ2mNhCM6SI/jyoRGT9cO7QaNAZMQ+J4S/4gyQcD5jQlrDX8I0K8aotz0kaSh2SzCf0qfFQALjfE5wHzRfiVkBVbTcK7yh/Y32DPMTI4FI7',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];