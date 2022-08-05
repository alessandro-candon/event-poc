#!/usr/bin/env bash
set -eux

rm -rf /var/www/.symfony/* || true

if [[ ! -z "${1-}" ]]; then
    if [[ -x "$1" || -x "$(which $1)" ]]; then
        exec $@
    elif [[ "${1#-}" != "$1" ]]; then
        exec php $@
    fi
fi

#In this way we can read the google credential in order to authenticate with google library
chmod 755 -r /root

exec symfony local:server:start --no-tls --port=80
