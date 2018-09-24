FROM nginx

COPY ./conf/app.conf /etc/nginx/conf.d/app.conf

ARG SERVER_NAME
ARG SERVER_ROOT

RUN sed -i.bak "s|SERVER_NAME|${SERVER_NAME}|g" /etc/nginx/conf.d/app.conf
RUN sed -i.bak "s|SERVER_ROOT|${SERVER_ROOT}|g" /etc/nginx/conf.d/app.conf