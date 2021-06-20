# Trip Service

[![License](https://poser.pugx.org/opportus/trip-service/license)](https://packagist.org/packages/opportus/trip-service)
[![Latest Stable Version](https://poser.pugx.org/opportus/trip-service/v/stable)](https://packagist.org/packages/opportus/trip-service)
[![Latest Unstable Version](https://poser.pugx.org/opportus/trip-service/v/unstable)](https://packagist.org/packages/opportus/trip-service)
[![Build](https://github.com/opportus/trip-service/workflows/Build/badge.svg)](https://github.com/opportus/trip-service/actions?query=workflow%3ABuild)
[![Codacy Badge](https://app.codacy.com/project/badge/Coverage/d3f5178323844f59a6ef5647cb11d9d7)](https://www.codacy.com/manual/opportus/trip-service/dashboard?utm_source=github.com&utm_medium=referral&utm_content=opportus/trip-service&utm_campaign=Badge_Coverage)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d3f5178323844f59a6ef5647cb11d9d7)](https://www.codacy.com/manual/opportus/trip-service?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=opportus/trip-service&amp;utm_campaign=Badge_Grade)

## Setup for dev environment

Requires:

- GNU/Linux OS
- Git
- Composer
- Docker
- Open and free 8080,8081,3306 ports on the dev environment to allow the 2 services below to communicate

Open a terminal and setup the existing [LinkerService](https://github.com/opportus/linker-service) which the
TripService depends on to link its trip steps:

```shell
git clone git@github.com:opportus/linker-service.git
cd linker-service
composer install --ignore-platform-reqs

sudo docker-compose --file docker/dev/docker-compose.yaml up
```

Then open a new terminal and setup the TripService:

```shell
git clone git@github.com:opportus/trip-service.git
cd trip-service
composer install --ignore-platform-reqs

# Set up your trip service database secrets or use the defaults as follow...
cat docker/dev/trip-service-database/.secret.env.dist > docker/dev/trip-service-database/.secret.env

sudo docker-compose --file docker/dev/docker-compose.yaml up
```

