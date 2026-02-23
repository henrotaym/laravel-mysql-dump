#!/bin/bash
./scripts/set_env.sh && \
docker compose build && \
./cli composer install && \
npx lefthook install
