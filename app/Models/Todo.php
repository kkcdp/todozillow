<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'todoname', 'deadlinedate', 'deadlinetime', 'importance', 'description', 'by_user_id', 'by_group_id','isDone'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\Group::class,
            'by_group_id'
        );
    }

    protected $casts = [
        'deadlinetime' => 'date:H:i',
        // 'deadlinedate' => 'datetime:d M, Y'
    ];

    public function scopeMostRecent(Builder $query): Builder
    {
        return $query->orderBy('deadlinedate', 'asc');
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['dateFrom'] ?? false,
        fn ($query, $value) => $query->where('deadlinedate', '>=', $value)
        )->when(
            $filters['dateTo'] ?? false,
        fn ($query, $value) => $query->where('deadlinedate', '<=', $value)
        )->when(
            $filters['search'] ?? false,
        fn ($query, $value) => $query->where('todoname', 'like', "%$value%")
        )->when(
            $filters['isFinished'] ?? false,
            fn($query, $value) => $query->where('isDone', $value)
        )->when(
            $filters['isImportant'] ?? false,
            fn($query, $value) => $query->where('importance', $value)
        );
    }

    // public function scopeImportant(Builder $query, array $filters2): Builder
    // {
    //     return $query->when(
    //         $filters2['isFinished'] ?? false,
    //         fn ($query, $value) =>
    //         $query->where('isDone', $value)
    //     );
    // }


}
