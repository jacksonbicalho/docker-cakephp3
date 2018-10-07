FROM alpine:3.8

RUN apk add --update nodejs nodejs-npm

ARG USER_ID

WORKDIR /src/webroot

RUN mkdir /.config
RUN mkdir /.npm
RUN chown -R $USER_ID:$USER_ID /.config
RUN chown -R $USER_ID:$USER_ID /.npm

RUN touch /.npmrc
RUN chown -R $USER_ID:$USER_ID /.npmrc
ENV NPM_CONFIG_USERCONFIG=/.npmrc

USER $USER_ID