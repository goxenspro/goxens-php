# Goxens PHP-SDK

## Raw Files

```bash
    git clone https://github.com/goxenspro/goxens-php.git
```


## Installing


Using composer:


```bash
    composer require goxens/goxens-php
```

## Initialization


```php
    $apiKey = 'YOUR_API_KEY';
    $userUid = 'YOUR_USER_ID';

    $goxens =  new \Goxens\Goxens($apiKey, $userUid);
```


## Request to send SMS

```php
    $send = $goxens->sendSms($apiKey,$userUid,$number,$sender,$message);
```

#### EXAMPLE

```php
    
    $sender = 'Goxens'; // Valid sender name
    $number = '+229XXXXXXXX';
    $message = 'Bienvenue sur Goxens';
    
    $send = $goxens->sendSms($apiKey,$userUid,$number,$sender,$message);
    
    var_dump($send);
    
```


## Request to get user balance


```php
    $solde = $goxens->verifySolde($apiKey);
```


#### EXAMPLE

```php
    $solde = $goxens->verifySolde($apiKey);
    
    var_dump($solde);
 
```



