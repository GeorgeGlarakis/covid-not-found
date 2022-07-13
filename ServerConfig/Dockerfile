FROM nginx:1.23-alpine

EXPOSE 80

COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./covid-not-found.conf /etc/nginx/sites-enabled/
COPY ./pgadmin.conf /etc/nginx/sites-enabled/