<?php

namespace NietThijmen\LaravelAuditTrail;

use NietThijmen\LaravelAuditTrail\Contracts\Auditable;
use NietThijmen\LaravelAuditTrail\Models\AuditTrail;

class AuditableObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(Auditable $auditable): void
    {
        AuditTrail::create([
            'action' => 'created',
            'model' => get_class($auditable),
            'model_id' => $auditable->id,
            'causer' => get_class(auth()->user()),
            'causer_id' => auth()->user()->id,
            'old_data' => null,
            'new_data' => $auditable->getAttributes(),
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(Auditable $auditable): void
    {
        AuditTrail::create([
            'action' => 'updated',
            'model' => get_class($auditable),
            'model_id' => $auditable->id,
            'causer' => get_class(auth()->user()),
            'causer_id' => auth()->user()->id,
            'old_data' => $auditable->getOriginal(),
            'new_data' => $auditable->getAttributes(),
        ]);
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(Auditable $auditable): void
    {
        AuditTrail::create([
            'action' => 'deleted',
            'model' => get_class($auditable),
            'model_id' => $auditable->id,
            'causer' => get_class(auth()->user()),
            'causer_id' => auth()->user()->id,
            'old_data' => $auditable->getAttributes(),
            'new_data' => null,
        ]);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(Auditable $auditable): void
    {
        AuditTrail::create([
            'action' => 'restored',
            'model' => get_class($auditable),
            'model_id' => $auditable->id,
            'causer' => get_class(auth()->user()),
            'causer_id' => auth()->user()->id,
            'old_data' => null,
            'new_data' => $auditable->getAttributes(),
        ]);
    }

    /**
     * Handle the User "forceDeleted" event.
     */
    public function forceDeleted(Auditable $auditable): void
    {
        AuditTrail::create([
            'action' => 'forceDeleted',
            'model' => get_class($auditable),
            'model_id' => $auditable->id,
            'causer' => get_class(auth()->user()),
            'causer_id' => auth()->user()->id,
            'old_data' => $auditable->getAttributes(),
            'new_data' => null,
        ]);
    }
}
