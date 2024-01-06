<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\DentistPolicy;
use App\Policies\MedicinePolicy;
use App\Policies\StaffPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Gate;
use App\Policies\PlanPolicy;
use App\Policies\ApointmentPolicy;
use App\Policies\PaymentInfoPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        $this->defineGatePlan();
        $this->defineGateApointment();
        $this->defineGatePaymentInfo();
        $this->defineGateDentist();
        $this->defineGateStaff();
        $this->defineGateMedicine();
    }

    public function defineGatePlan(){
        Gate::define('add-plan',[PlanPolicy::class,'create']);
    }

    public function defineGateApointment(){
        Gate::define('list-apointment',[ApointmentPolicy::class,'index']);
        Gate::define('delete-apointment',[ApointmentPolicy::class,'delete']);
    }

    public function defineGatePaymentInfo(){
        Gate::define('list-paymentinfo',[PaymentInfoPolicy::class,'index']);
    }

    public function defineGateDentist(){
        Gate::define('add-dentist',[DentistPolicy::class,'create']);
        Gate::define('edit-dentist',[DentistPolicy::class,'update']);
    }

    public function defineGateStaff(){
        Gate::define('add-staff',[StaffPolicy::class,'create']);
        Gate::define('edit-staff',[StaffPolicy::class,'update']);
    }

    public function defineGateMedicine(){
        Gate::define('add-medicine',[MedicinePolicy::class,'create']);
        Gate::define('edit-medicine',[MedicinePolicy::class,'update']);
    }
}
