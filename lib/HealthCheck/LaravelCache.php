<?php 

namespace Xjtuana\HealthCheck;

use Cache;

class LaravelCache implements CacheInterface {

	/**
     * Get the value of the key from cache.
     * 
     * @param  string  $key
     * 
     * @return mixed
     */
    public function get(string $key) {
        return Cache::get($key);
    }
    
    /**
     * Get the value of the key from cache.
     * 
     * @param  string  $key
     * @param  mixed   $value
     * @param  int     $ttl    expiration of the cache (in minites)
     * 
     * @return bool
     */
    public function set(string $key, $value, int $ttl = 60): bool {
        Cache::put($key, $value, $ttl);
        return true;
    }
}