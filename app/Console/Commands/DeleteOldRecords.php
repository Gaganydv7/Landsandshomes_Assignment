<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Data;

class DeleteOldRecords extends Command
{
    protected $signature = 'data:delete-old';

    protected $description = 'Delete 30 days old records';

    public function handle()
    {
        $thresholdDate = now()->subDays(30);

        $dataToDelete = Data::where('created_at', '<=', $thresholdDate)->get();

        foreach ($dataToDelete as $data) {
            Storage::delete($data->file_path);
            $data->delete();
        }

        $this->info('30 days old records deleted successfully.');
    }
}
