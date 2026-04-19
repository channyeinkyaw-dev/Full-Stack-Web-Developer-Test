#!/bin/sh
# Inject APP_BASE_URL into CodeIgniter's .env at container startup.
# This allows the Cloud Run service URL to be passed as an env var substitution
# in cloudbuild.yaml without rebuilding the image.

ENV_FILE=/var/www/html/.env

if [ -n "$APP_BASE_URL" ]; then
  sed -i "s|app.baseURL = \".*\"|app.baseURL = \"$APP_BASE_URL\"|" "$ENV_FILE"
  echo "[entrypoint] app.baseURL set to: $APP_BASE_URL"
else
  echo "[entrypoint] APP_BASE_URL not set — CI4 will auto-detect from request headers"
fi

exec "$@"
