<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "category_id",
        "description",
        "measure",
        'value',
        'user_id',
        'amount'
    ];


    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function measure()
    {
        return $this->hasOne(Measures::class, 'id', 'measure_id');
    }

    public function getAll($return = 'get', $paginate = '*')
    {
        if(strpos($paginate, ','))
        {
            list($param1, $param2) = explode(',', $paginate);
            str_replace(' ', '', $param1);
            str_replace(' ', '', $param2);

            return $this->latest()
                    ->$return($param1, $param2);
        }

        return $this->latest()
                    ->$return($paginate);
    }

    public function filter($filters = false, $return = 'get', $paginate = '*')
    {
        if($filters)
        {
            return $this->latest()
                    ->where($filters['column'], 'like', '%'.$filters['query'].'%')
                    ->$return($paginate);
        } else
        {
            return $this->getAll($return, $paginate);
        }
    }

    public function getBySlug($slug)
    {
        return $this->where('slug', $slug)
                    ->first();
    }

    public function featured($return = 'get', $paginate = '*')
    {   
        
            return $this->latest()
                ->where('featured', 'like' , 1)
                ->$return($paginate);
        
        
    }
    // public function featured($id)
    // {
    //     return->
    // }
    public function slugVerify($slug)
    {
        $count = 2;

        $query = $this->getBySlug($slug);

        if(!$query)
        {
            return $slug;
        } else
        {
            do
            {
                $query = $this->getBySlug($slug.'-'.$count);

                if($query)
                {
                    $count += 1;
                }
            } while($query);
        }

        return $slug.'-'.$count;
    }

    public function getLatest($return = 'get', $paginate = '*')
    {
        return $this->getAll('orderBy', 'created_at', 'desc')
                ->where('featured', 'like', 0)
                ->$return($paginate);
    }
}
