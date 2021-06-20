FROM mysql:8.0.25
COPY docker/prod/trip-service-database/config/mysql.conf /etc/mysql/conf.d/default.cnf
RUN chmod 0444 /etc/mysql/conf.d/default.cnf