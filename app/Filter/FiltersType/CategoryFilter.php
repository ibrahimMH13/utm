<?php


namespace App\Filter\FiltersType;


use App\Filter\Contract\IFilter;
use App\Filter\FilterTrait;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter implements IFilter
{
    use FilterTrait;
    const DEFAULT_VALUE ='desc';

    public function filter(Builder $builder, $value)
    {
          if ($id = $this->resolveValue($value)){
           return   $builder->whereHas('tags',function ($query) use ($id){
                  $query->where('tag_id', $id);
              });
          }
    }

    public function mappings()
    {
        $categories = Tag::pluck('id','slug');
        $data = [];
       foreach ($categories as $name=>$category){
           $data[$name] = $category;
       }
       return $data;
    }
}
