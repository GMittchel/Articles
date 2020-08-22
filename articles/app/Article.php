<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Выводит все комментарии статьи
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Выводит все теги статьи
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_article', 'article_id', 'tag_id');
    }

    /**
     * Показывает количество просмотров статьи
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function views()
    {
        return $this->hasMany(View::class);
    }

    /**
     * Показывает количество лайков статьи
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
