<?php

namespace App\Filters;

class ApplicationFilter extends Filter{

    public function applyPosition($value=""){

        $this->builder->whereHas('position',fn($builder)=>$builder->where('slug','LIKE',"%$value%"));
    }

    public function name($value="")
    {
        $this->builder->where('name','LIKE',"%$value%");
    }
    public function email($value="")
    {
        $this->builder->where('email','LIKE',"%$value%");
    }
    public function phone($value="")
    {
        $this->builder->where('phone','LIKE',"%$value%");
    }
}
