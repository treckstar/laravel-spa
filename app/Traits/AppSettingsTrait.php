<?php

namespace App\Traits;

use App\Models\Setting;

trait AppSettingsTrait
{
    /**
     * Process the settings for additional app needs.
     *
     * @param  \App\Models\Setting  $setting
     * @return \App\Models\Setting
     */
    public function processSettingForAdditionalAppChanges(Setting $setting)
    {
        if ($setting->key == 'enableSentryMonitoring') {
            $this->setEnv('SENTRY_IO_ENABLED', $setting->val, config('services.sentry.enabled'));
            putenv('SENTRY_IO_ENABLED='.$setting->val);
            config(['services.sentry.enabled' => $setting->val]);
        }
        if ($setting->key == 'sentryIoDSN') {
            $this->setEnv('SENTRY_LARAVEL_DSN', $setting->val, config('sentry.dsn'));
            putenv('SENTRY_LARAVEL_DSN='.$setting->val);
            config(['sentry.dsn' => $setting->val]);
        }
        if ($setting->key == 'enableSentryMonitoringFeedbakForm') {
            $this->setEnv('SENTRY_IO_USER_FEEDBACK_ENABLED', $setting->val, config('services.sentry.feedback-enabled'));
            putenv('SENTRY_IO_USER_FEEDBACK_ENABLED='.$setting->val);
            config(['services.sentry.feedback-enabled' => $setting->val]);
        }

        if ($setting->key == 'appApplePrivateKey') {
            $this->setEnv('APPLE_PRIVATE_KEY', $setting->val, config('services.apple.private_key'));
            putenv('APPLE_PRIVATE_KEY='.$setting->val);
            config(['services.apple.private_key' => $setting->val]);
        }
        if ($setting->key == 'appAppleTeamId') {
            $this->setEnv('APPLE_TEAM_ID', $setting->val, config('services.apple.team_id'));
            putenv('APPLE_TEAM_ID='.$setting->val);
            config(['services.apple.team_id' => $setting->val]);
        }
        if ($setting->key == 'appAppleKeyId') {
            $this->setEnv('APPLE_KEY_ID', $setting->val, config('services.apple.key_id'));
            putenv('APPLE_KEY_ID='.$setting->val);
            config(['services.apple.key_id' => $setting->val]);
        }
        if ($setting->key == 'appAppleId') {
            $this->setEnv('APPLE_CLIENT_ID', $setting->val, config('services.apple.client_id'));
            putenv('APPLE_CLIENT_ID='.$setting->val);
            config(['services.apple.client_id' => $setting->val]);
        }
        if ($setting->key == 'appAppleSecret') {
            $this->setEnv('APPLE_CLIENT_SECRET', $setting->val, config('services.apple.client_secret'));
            putenv('APPLE_CLIENT_SECRET='.$setting->val);
            config(['services.apple.client_secret' => $setting->val]);
        }
        if ($setting->key == 'appAppleRedirect') {
            $this->setEnv('APPLE_REDIRECT_URI', $setting->val, config('services.apple.redirect'));
            putenv('APPLE_REDIRECT_URI='.$setting->val);
            config(['services.apple.redirect' => $setting->val]);
        }
        if ($setting->key == 'appStackExchangeSite') {
            $this->setEnv('STACKEXCHANGE_CLIENT_SITE', $setting->val, config('services.stackexchange.site'));
            putenv('STACKEXCHANGE_CLIENT_SITE='.$setting->val);
            config(['services.stackexchange.site' => $setting->val]);
        }
        if ($setting->key == 'appStackExchangeKey') {
            $this->setEnv('STACKEXCHANGE_CLIENT_KEY', $setting->val, config('services.stackexchange.key'));
            putenv('STACKEXCHANGE_CLIENT_KEY='.$setting->val);
            config(['services.stackexchange.key' => $setting->val]);
        }
        if ($setting->key == 'appStackExchangeId') {
            $this->setEnv('STACKEXCHANGE_CLIENT_ID', $setting->val, config('services.stackexchange.client_id'));
            putenv('STACKEXCHANGE_CLIENT_ID='.$setting->val);
            config(['services.stackexchange.client_id' => $setting->val]);
        }
        if ($setting->key == 'appStackExchangeSecret') {
            $this->setEnv('STACKEXCHANGE_CLIENT_SECRET', $setting->val, config('services.stackexchange.client_secret'));
            putenv('STACKEXCHANGE_CLIENT_SECRET='.$setting->val);
            config(['services.stackexchange.client_secret' => $setting->val]);
        }
        if ($setting->key == 'appStackExchangeRedirect') {
            $this->setEnv('STACKEXCHANGE_REDIRECT_URI', $setting->val, config('services.stackexchange.redirect'));
            putenv('STACKEXCHANGE_REDIRECT_URI='.$setting->val);
            config(['services.stackexchange.redirect' => $setting->val]);
        }
        if ($setting->key == 'appGitLabId') {
            $this->setEnv('GITLAB_CLIENT_ID', $setting->val, config('services.gitlab.client_id'));
            putenv('GITLAB_CLIENT_ID='.$setting->val);
            config(['services.gitlab.client_id' => $setting->val]);
        }
        if ($setting->key == 'appGitLabSecret') {
            $this->setEnv('GITLAB_CLIENT_SECRET', $setting->val, config('services.gitlab.client_secret'));
            putenv('GITLAB_CLIENT_SECRET='.$setting->val);
            config(['services.gitlab.client_secret' => $setting->val]);
        }
        if ($setting->key == 'appGitLabRedirect') {
            $this->setEnv('GITLAB_REDIRECT_URI', $setting->val, config('services.gitlab.redirect'));
            putenv('GITLAB_REDIRECT_URI='.$setting->val);
            config(['services.gitlab.redirect' => $setting->val]);
        }

        // NEW_PROVIDER_PLUG :: Put New Provider HERE
    }

    /**
     * Set .env variables directly to the file.
     *
     * @param  string  $key
     * @param  string|null  $value
     * @param  string|null  $configed
     */
    public function setEnv(string $key, $value, $configed = null)
    {
        $term = $configed != null ? $configed : env($key);
        $path = app()->environmentFilePath();
        $escaped = preg_quote('='.$term, '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));

        if (file_exists(\App::getCachedConfigPath())) {
            \Artisan::call('config:cache');
        }
    }
}