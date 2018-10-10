case $1 in
  run)
    php -S localhost:8080
  ;;

  *)
    echo "nope"
  ;;
esac

