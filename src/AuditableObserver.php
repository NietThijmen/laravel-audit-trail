<?php

namespace NietThijmen\LaravelAuditTrail;

use Illuminate\Support\Facades\Log;
use NietThijmen\LaravelAuditTrail\Contracts\Auditable;
use NietThijmen\LaravelAuditTrail\Models\AuditTrail;

class AuditableObserver
{

    private function get_causer_data(Auditable $auditable)
    {
        if(auth()->user() !== null) {
            return [
                'causer' => get_class(auth()->user()),
                'causer_id' => auth()->user()->id,
            ];
        }

        return [
            'causer' => null,
            'causer_id' => null,
        ];
    }

    /**
     * Handle the User "created" event.
     */
    public function created(Auditable $auditable): void
    {
        $causer_data = $this->get_causer_data($auditable);

        try {
            AuditTrail::create([
                'action' => 'created',
                'model' => get_class($auditable),
                'model_id' => $auditable->id,
                'causer' => $causer_data['causer'],
                'causer_id' => $causer_data['causer_id'],
                'old_data' => null,
                'new_data' => $auditable->getAttributes(),
            ]);
        } catch (\Throwable $throwable) {
            Log::debug("Error creating audit trail for model: " . get_class($auditable) . " with id: " . $auditable->id);
        }

    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(Auditable $auditable): void
    {
        $causer_data = $this->get_causer_data($auditable);

        try {
            AuditTrail::create([
                'action' => 'updated',
                'model' => get_class($auditable),
                'model_id' => $auditable->id,
                'causer' => $causer_data['causer'],
                'causer_id' => $causer_data['causer_id'],
                'old_data' => $auditable->getOriginal(),
                'new_data' => $auditable->getAttributes(),
            ]);
        } catch (\Throwable $throwable) {
            Log::debug("Error creating audit trail for model: " . get_class($auditable) . " with id: " . $auditable->id);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(Auditable $auditable): void
    {
        $causer_data = $this->get_causer_data($auditable);

        try {
            AuditTrail::create([
                'action' => 'deleted',
                'model' => get_class($auditable),
                'model_id' => $auditable->id,
                'causer' => $causer_data['causer'],
                'causer_id' => $causer_data['causer_id'],
                'old_data' => $auditable->getAttributes(),
                'new_data' => null,
            ]);
        } catch (\Throwable $throwable) {
            Log::debug("Error creating audit trail for model: " . get_class($auditable) . " with id: " . $auditable->id);
        }
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(Auditable $auditable): void
    {
        $causer_data = $this->get_causer_data($auditable);

        try {
            AuditTrail::create([
                'action' => 'restored',
                'model' => get_class($auditable),
                'model_id' => $auditable->id,
                'causer' => $causer_data['causer'],
                'causer_id' => $causer_data['causer_id'],
                'old_data' => null,
                'new_data' => $auditable->getAttributes(),
            ]);
        } catch (\Throwable $throwable) {
            Log::debug("Error creating audit trail for model: " . get_class($auditable) . " with id: " . $auditable->id);
        }
    }

    /**
     * Handle the User "forceDeleted" event.
     */
    public function forceDeleted(Auditable $auditable): void
    {
        $causer_data = $this->get_causer_data($auditable);

        try {
            AuditTrail::create([
                'action' => 'forceDeleted',
                'model' => get_class($auditable),
                'model_id' => $auditable->id,
                'causer' => $causer_data['causer'],
                'causer_id' => $causer_data['causer_id'],
                'old_data' => $auditable->getAttributes(),
                'new_data' => null,
            ]);
        } catch (\Throwable $throwable) {
            Log::debug("Error creating audit trail for model: " . get_class($auditable) . " with id: " . $auditable->id);
        }
    }
}
