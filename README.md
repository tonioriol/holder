# Holder

A placeholder image generator.

![image](https://cloud.githubusercontent.com/assets/712937/19407061/cd653f86-9296-11e6-9be0-44d88dff903b.png)

 Its framework agnostic but comes with integration for Laravel (Facade, ServiceProvider and route).

## Install

`composer require t20n/holder`

## General Usage
 
There's the `T20n\Holder\Holder` class that has `make` method that accepts `height`, `width`, and optionally third parameter `color` in hex format.

### Example

```
$holder = new T20n\Holder\Holder;
$holder->make($height, $width, $color = 'A8E6CE');
$holder->response('png');
```

## Laravel Usage

Add the service provider and alias to the `config/app.php` of your laravel install:

- Provider:`T20n\Holder\HolderServiceProvider::class,`
- Alias:`'Holder' => T20n\Holder\Facades\HolderFacade::class,`



### Example 

The Laravel Service Provider automatically declares the `holder` route within ready to use, the response is a `png` image of the given dimensions.

Optionally the background color of the image can be set, defaults to `#CCCCCC` otherwise.

`http://laravel.app/holder/640/480/A8E6CE` that is `http://laravel.app/holder/{height}/{width}/{[optional]backgroundColor}`
