<?php

namespace BukApi\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use BukApi\Constants\GeneralConstant;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend(GeneralConstant::DATE_MULTI_FORMAT, function($attribute, $value, $formats) {
            foreach($formats as $format) {
      
              $parsed = date_parse_from_format($format, $value);
      
              if ($parsed[GeneralConstant::ERROR_COUNT] === GeneralConstant::CERO && $parsed[GeneralConstant::WARNING_COUNT] === GeneralConstant::CERO) {
                return true;
              }
            }
      
            return false;
          });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
