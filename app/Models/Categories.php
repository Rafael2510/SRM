<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];

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

    public function getBySlug($slug)
    {
        return $this->where('slug', $slug)
                    ->first();
    }

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

    public function getLatest($return = 'get', $paginate = '*')
    {
        return $this->getAll('orderBy', 'created_at', 'desc')
                ->$return($paginate);
    }
}
