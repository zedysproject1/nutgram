<?php


namespace SergiX44\Nutgram\Cache;

use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException;

class UserCache extends BotCache
{
    protected const USERDATA_TTL = null;

    protected const USERDATA_PREFIX = 'USER';

    public function __construct(CacheInterface $cache, ?int $botId, ?int $ttl = self::USERDATA_TTL)
    {
        parent::__construct($cache, self::USERDATA_PREFIX, $botId, $ttl);
    }

    /**
     * @param  int  $userId
     * @param  string  $key
     * @param  null  $default
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function get(int $userId, string $key, $default = null): mixed
    {
        return $this->cache->get($this->makeKey($userId, $key), $default);
    }

    /**
     * @param  int  $userId
     * @param  string  $key
     * @param  mixed  $data
     * @return bool
     * @throws InvalidArgumentException
     */
    public function set(int $userId, string $key, mixed $data): bool
    {
        return $this->cache->set($this->makeKey($userId, $key), $data, $this->ttl);
    }

    /**
     * @param  int  $userId
     * @param  string  $key
     * @return bool
     * @throws InvalidArgumentException
     */
    public function delete(int $userId, string $key): bool
    {
        return $this->cache->delete($this->makeKey($userId, $key));
    }
}
