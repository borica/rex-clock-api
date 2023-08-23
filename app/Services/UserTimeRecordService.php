<?php

namespace App\Services;

use App\Models\UserTimeRecord;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class UserTimeRecordService
{
    /**
     * @param string $userId
     * @return UserTimeRecord
     */
    public function store(string $userId): UserTimeRecord
    {
        $userTimeRecord = new UserTimeRecord(['user_id' => $userId]);
        $userTimeRecord->save();

        return $userTimeRecord;
    }

    /**
     * @param string $userId
     * @return Collection
     */
    public function getTodayTimeRecords(string $userId): Collection
    {
        return UserTimeRecord::query()
            ->whereUserId($userId)
            ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
            ->get();
    }
}