FROM alpine:3.8

RUN apk add --update nodejs nodejs-npm


# ENTRYPOINT ["npm"]

# FROM node:boron

# # Create app directory
# RUN mkdir -p /usr/src/app
# WORKDIR /usr/src/app

# # Install app dependencies
# COPY package.json /usr/src/app/
# RUN npm install

# # Bundle app source
# COPY . /usr/src/app

ARG USER_ID

WORKDIR /src/webroot

RUN mkdir /.config
RUN mkdir /.npm
RUN chown -R $USER_ID:$USER_ID /.config
RUN chown -R $USER_ID:$USER_ID /.npm

RUN touch /.npmrc
RUN chown -R $USER_ID:$USER_ID /.npmrc
ENV NPM_CONFIG_USERCONFIG=/.npmrc

# RUN npm config set prefix /src/webroot
# RUN npm set registry https://registry.npmjs.org/

USER $USER_ID

# EXPOSE 8080
# CMD [ "npm", "start" ]