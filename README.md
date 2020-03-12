# Log Module
[![Build Status](https://travis-ci.org/fond-of/spryker-setup.svg?branch=master)](https://travis-ci.org/fond-of/spryker-log)
[![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg)](https://php.net/)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/fond-of-spryker/log)

## Installation

```
composer require fond-of-spryker/log
```

#### AWS CloudWatch Log Handler
Register in LogDependencyProvider for YVES/ZED/GLUE
```
protected function addLogHandlers(Container $container)
    {
        ...
            if (Environment::isProduction() || Environment::isStaging()) {
                ...
                $logHandlers[] = new AwsCloudWatchHandlerPlugin();
            }

            return $logHandlers;
        };

        return $container;
    }
```

## Configuration
#### AWS CloudWatch
```
// ---------- AWS CloudWatch Logging
$config[LogConstants::AWS_REGION] = 'eu-west-1';
$config[LogConstants::AWS_KEY] = 'AWSKEY';
$config[LogConstants::AWS_SECRET] = 'AWSSECRET';
$config[LogConstants::AWS_VERSION] = 'latest';
$config[LogConstants::AWS_LOG_GROUP_NAME_YVES] = sprintf('%s-%s',$ENVIRONMENT, $CURRENT_STORE);
$config[LogConstants::AWS_LOG_GROUP_NAME_ZED] = $config[LogConstants::AWS_LOG_GROUP_NAME_YVES];
$config[LogConstants::AWS_LOG_STREAM_NAME_YVES] = 'YVES';
$config[LogConstants::AWS_LOG_STREAM_NAME_ZED] = 'ZED';


some more optinal constants:
LogConstants::AWS_LOG_LEVEL_YVES|ZED|GLUE //string default 500
LogConstants::AWS_LOG_TAGS //array default empty array
LogConstants::AWS_LOG_BATCH_SIZE //int default = 1 max = 10000
```

## Changelog
20200312 - added functionality to log into AWS CloudWatch
