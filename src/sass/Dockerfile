FROM ruby

RUN gem install sass

WORKDIR /app

COPY ./docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]
CMD ["sass", "--watch", "sass:css","--style", "compressed" ]