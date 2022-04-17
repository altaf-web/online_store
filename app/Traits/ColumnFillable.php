<?php
namespace App\Traits;

    trait ColumnFillable {

        public function getFillable(): array
        {
            return \Illuminate\Support\Facades\Schema::getColumnListing($this->getTable());
        }
    }
?>
