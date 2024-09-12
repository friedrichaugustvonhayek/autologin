import parallelInteractions as pI
import connect2db as db

allCredentials = db.get_rows()
pI.start_all(allCredentials, "start")
