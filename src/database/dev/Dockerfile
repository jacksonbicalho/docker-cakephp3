FROM postgres:9.6-alpine
ENV POSTGRES_DB ovitrampas
ENV POSTGRES_USER ovitrampas
ENV POSTGRES_PASSWORD ovitrampas

ARG USER_ID

RUN apk --no-cache add shadow && \
    usermod -u $USER_ID postgres && \
    groupmod -g $USER_ID postgres

USER $USER_ID