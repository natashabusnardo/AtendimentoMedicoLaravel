from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
import uvicorn
import index

app = FastAPI()

origins = ["*"]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

@app.get("/cidcode/{code}")
async def cidcode(code: str):
    result = index.searchCidCode(code)
    resultJson = {}
    if len(result) > 0:
        resultJson = {
            "descricao": result,
        }
    else:
        resultJson = {
            "message": "Cid code não existente."
        }
    return resultJson

if __name__ == "__main__":
    uvicorn.run(app, host="localhost", port=8080)