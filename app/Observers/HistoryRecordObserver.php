<?php

namespace App\Observers;

use App\Models\HistoryRecord;

class HistoryRecordObserver
{
    public function saving(HistoryRecord $record)
    {
        $record->msg = clean($record->msg, 'user_topic_body');
    }
}
