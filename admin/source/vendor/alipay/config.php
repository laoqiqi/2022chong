<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2021002109692580",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAnEnA/hvrnmyl23BJ/v94xJwsz8VLRfw3A1YgJyMtkXYhmd13IYK97uwfcdlD9BS/szHywpSdoyh6vqrhOlDsJ9AeAiJJO/Y2FLy+cEQGrhgBCkvfyDAXLI7DNIf5Mj+8SFxfee/qIl/ii2fC3pjJBQe5GoyohJC4vBtRSCT7/l+5mS6qcjzohX4CivumATa01AYBvYSbMYq/3Fy1gExKjB28n/FIlGMAtQgTAKXD3v1hmAi76Fjo7uxa3P9fGGeefDnCGvOEyRuE4zIugoHpWWrcvYNsP8NSyDL6phGqy3MG6x5xV8TkfyPOGQiDmCllweBdGB7F0ttaQzFK7MosqQIDAQABAoIBAEVmgurUHyb0fBobnOA9NbWo3EVPCQQE4bD7l7+JYXzMhlM7AuHAmvLzq2r03bYPWKkMLw60y+Nd4FO2sdkhghyT0B+GdhrIVG+U+MQFkSnRwvR9iNvubvv8UTaMgt4La2J+km8lWET3azQYWXJbSjiPm2TsvRBQ65esUcXFlpj3216pLh6qGhONLZx/HvvzkFe+OxSfDOb4Tlv5PLm46nVt7hP1rPB+84HOJ2KWMaPaP0nsTMu0QGAoL2bGPxb8vEg0no0/lrlDymMSBc4tPk8YKmnPyqMZfMpEtFc+QRmr+OWft2TVNtih/ePI7voZILhn8TnFU4NHAatAy1MO2TkCgYEAyTwrwd64zEg0nPrQIc1mnoR4GOKlEbhRIm7HIu0vvnr9blxFn/LLXY0fah/Y2I2en/Lwiika98VruTlhraled2oRcLeWAHk/VJYna1Pf5lz+YTjjIlU803ciOFOPr4UroSO1mruGdsIP9X7/viOF2ZUN38Q6I3ryWdWXSUJRyzMCgYEAxtIth7n9mmLoYIjKvYMMV3J9VFetyZDTGtAgurbPu7TdEYiD6FXEJfkUFkjH0K5jCgWvcAJ5bJxUNlRF+WEjeoZ1dTWRl95BdW9c6lfTvl6FEI0RsO9BwuUHjWtzJbpQmAdolUOV/klS6dhXq6efkHRQxwdN/TUbJt4ARW/CiLMCgYAsCbTxulHqsqqA6AqAOzkH26mEmKTTGej3hhKiPBHEt5maeyrpc/K5SFblnI6R5XwfOMUXFyPFsTh/0mTj4jrAG0Ax0JtNAzuuwSVjQXmwKg2pLQ/XxZuIE3wzo2XAXX5Mx0nI0Nz+RD3F1cMV0yRJl2rv2zt15EQBENMIvzCzLQKBgA2+7DztA/aPjgdWjcXKcKj/FmElarN72syIxSqDhxswJvSWXqBKhbQmY1gjEgWAeQJxYC67TQ/QQxY6f1f9ekl3UFmZKYa5bAcleuQMzGvl9wcs6aM093P1B6+kVSKvnfDU2ksvkAgzo5LdTTpl7Wc8U3VfMOonqMfoI1apomZ3AoGBAJrqnwtwldHgI0dBG2q0ev+kqLAi9iLO7FOQ2o0W8mU5ARqWJWPeJ+NvAXYhcBvI3kq0xAyweps3TmTbz6ERrS6MJTBh7lvXRtIZZGhtLa497gRbhpWKWJZDJgphHw1lpxwvIclv3Yv+6gFJuCWlvUXAM7KMz1cqcTq9bsHTvlch",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAolm+Bmgd2ysNcyYZc7mnAhntb0WGqUbVwsZZbzhZvjLKTXdhVKdoMqcFda9l9rawyKoTavfdI3FvrHsmQe8uCoXI8ejQXP6QwTi8zSnqY2kTggG+UFGG/qhzvmFjN4fWiw1G26C599Y82LEuxMcFSsX6AXkCfZxfMXAlp3EPOk7+ZpGLKLYkMkhvJ6Gki3EVLdfKeRSiv5VS6uTAEeRGEoRvNF7a1gJ8izbTf05xuzluFT/2v3CnWRLpyhDkpk3nnhb8L8bOU6MNWLg7wxJKWnyCr/0TAZNOn39juU6AYW9osgcjWgEh06cN/m0+c2tVaqkkPknkqve8NJ1Xj/F6iwIDAQA",
		
	
);