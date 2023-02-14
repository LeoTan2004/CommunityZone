<?php

namespace service\authority;

use JetBrains\PhpStorm\Deprecated;

class EmailAuthority extends Authority
{

    #[Deprecated]
    public function setAuthority(string $arg1, string $arg2)
    {
        //todo 这里还有待完善，使用邮箱验证登录。完善之后即可使用
    }
}