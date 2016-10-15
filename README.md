# Holder

A placeholder image generator.

## Install

1. `composer require t20n/holder`
2. [laravel] add the service provider and alias to the `config/app.php` of your laravel install:
  - Provider:`T20n\Holder\HolderServiceProvider::class,`
  - Alias:`'Facade' => T20n\Holder\Facades\HolderFacade::class,`

This will register a route called holder in the laravel app.

## Usage
  
In laravel: `http://laravel.app/holder/640/480/FFFFFF` that is `http://laravel.app/holder/{height}/{width}/{[optional]backgroundColor}` 
               