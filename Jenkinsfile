pipeline {
    agent any
    stages {
        stage('Checking Current Time') {
            steps {
                script {
                    sh '''
                        echo "🚀 Deploying Production..."
                        date
                    '''
                }
            }
        }
        stage('Deploy') {
            steps {
                script {
                    sh '''
                        echo "🚀 Deploying Production..."

                        cd /var/www/api.gpsites.io
                        git config --global --add safe.directory /var/www/api.gpsites.io
                        git checkout main
                        git pull origin main

                        # Install PHP dependencies with Composer
                        if command -v composer >/dev/null 2>&1; then
                          echo "📦 Installing PHP dependencies (Composer)"
                          composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
                        else
                          echo "⚠️ Composer is not installed on this agent. Skipping composer install."
                        fi

                        # Run Laravel optimizations and migrations
                        if command -v php >/dev/null 2>&1; then
                          echo "🧹 Clearing and caching Laravel config/routes/views"
                          php artisan cache:clear || true
                          php artisan config:clear || true
                          php artisan route:clear || true
                          php artisan view:clear || true

                          php artisan config:cache || true
                          php artisan route:cache || true
                          php artisan view:cache || true

                          #echo "⚙️ Optimizing framework"
                          #php artisan optimize
                        else
                          echo "⚠️ PHP CLI is not available. Skipping Laravel artisan commands."
                        fi
                    '''
                }
            }
        }
    }
}
