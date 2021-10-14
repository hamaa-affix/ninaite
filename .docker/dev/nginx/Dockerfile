FROM nginx:latest

RUN apt update && apt install -y procps
RUN rm /etc/nginx/conf.d/default.conf
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./dev.ninaite-affix.work.conf /etc/nginx/conf.d/dev.ninaite-affix.conf
