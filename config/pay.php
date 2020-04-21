<?php

return [
    'alipay' => [
        'app_id'         => '2016091000479947',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvz6dwGArYO1KGhaX4voiZ0tVs+smDsJCgyhC6TcSswnIVjnqqMfwFfihkwmwesaI6Mw7IPclnxEOHL1uN7DKg8PMltleVn+4K+5SQIEO+vxqw4vRCy0HM+YNtSGCPEoaIrO/w5yGjweZIcoDYnReSeT/tWMpozCfCh3rkPjgAczzta0atEYdambglS5JcZbZx3t40Pc3gkVVw8N6AImAz751wPUQT2K4oFSg2ZI5E8T9velIY1Rpj65hNxVgHQKeFcr8LZn2ejEvmcQdGfO53uqoV3O4KT+Wi0SmCR4aVGmCtH3zTiCP9mlgPCUTe6jwWXFrrnaBT3rQ0uE+PPiTWQIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEAswoKvJNNBmn8TR97dC+iRy0w87GPsep1wbr0P7TQFHZWDRK04vUcM2qd1yFjhqrLQsSDEbpw5ZQtzffFyNeyEyzSEkQcviX72xTxmeVNvPKg48Ny+xqS4ODJDM7l/Ui8S7FEJhET7DmiKKMA1BwwIHF7IK6N6xGnYKnwqrgVpjLM6c5YcgzSTzRwglyFJ1+LD4UL+PGPZKH0HkrQOvT0upLw9+xdOovGHkM+OSP8VQt9ViM0ODjsc5SAMywcNtAc418lblQFptHGyvTw+kUx3TfQBwRqctJUq4LbsvVLDA/oG63+8v5EzGaV2LLdbjINA0Ul/q0r5VuOCgT7kJ9SQwIDAQABAoIBAERxzFT3AvU2w0tAg9OQ+jq3ngUrlkFv3oCnVgScvQd1jcQFqL0y8wr88UZy7zdmR7pIocq/ObWqhjA9TpFPVDZcZhqxi0NuBfBk+0/YB3X6U2N/Lo+sQwZRKMsKtYW0rrdJF0JuOO2PwtxCJGjyNbvRZj7CPGLnJtOfY+//29bi4++tGU8ezaTYwnc2eDgZLHxJl1+vCsdjNRN8h7NBx4OwRFf3/zkiLYm2iwwJc2sE+VH+5e8M2hh6LGkZGJaW+oAx4ZwszVqN/dTvR9V4jXu/r+Pxln49YK9X/PxPnnzb6QaIyKd/EBJaoHkLACr/zWzKdIFlfcNajhzB6gdsyIECgYEA8W/glZaPO/w8jpEkinP/xRk97rjGw1Yajkl4irmGtVdaSOxGxbnROabvsUOMSMpVzlIE8qloiAgLW1yn2oDK0TuIs5MkX8SREm6E4JFMAmEZYtg/tmLpPdfLly83EZKZ2VEyUfx17lRscGESqKJcj1yTuoIx5WXxKAB0awh02eECgYEAvdan9m9sswpA3bZalUBTkS6EOI90PST3tWGL9cRdCGEzTUmVnoVvYPWUCdZCYx82jHg2ShSEkEMHcukOlxhiBbZNZ2R4Up0/X0wuDGWeMf7QjJNw1IQcMJbZ3LfEPrN+tA0bH975EP4ho/K8nsGTUK+qZanen2fPF215sFY7mKMCgYAgTvpcyjMMsepgoaekJ3W4qHITOgLPLPyMweQxnDYcmj3ouEWYPA91iZNVw1ZIf1sQKwWie20Tlw/9/94ubUG20iKu9SfO8P0A3G1Hp+nl/5xoD8wm2gGgVvpVlunlnhqcbDMxqXkWlZGVUEgw7Nk6Dgdu0/FdY1DsK3Nox07rwQKBgQCvlkDKzmri+yPeLlGAZPwmd7jyO7WO7Id1K+Fxk4tdOdJitSH/enn3W43uv0+uMOuaZ4IHaQzoBid4oJnPJU1c7S6Q6DvmZe18rpCVBNSad47bx3AAEKWmR5EA9rQ8LneN/+VLyEfk8Lma0+SkjnU8lw5rdAAmvrSsfaSldk0vMwKBgQC7L1lYq9yFLc4K8qbfGbHXgm/rvFpMnmDwAmMKm1t3TKSgWpgUQQTeF9MtWFZesDzzMV99qhbkSmD3plO/v7I9h54mycuB98kndTiea48S+sYjkDhdmMlCk+FUAItSBf/1GuwZYuBtcZ9jHXy8r1afq45KnUyv3aQDRaTuylPFrQ==',
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