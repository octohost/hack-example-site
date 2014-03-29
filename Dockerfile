FROM octohost/hack

ADD . /srv/www

EXPOSE 80

CMD service hhvm start && service nginx start
